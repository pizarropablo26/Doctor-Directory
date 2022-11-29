-- start the database
SHOW databases;
USE assign2db;

-- ---------
-- Part 1 SQL Updates
SELECT * FROM hospital;
UPDATE hospital 
SET headdoc = (SELECT licensenum FROM doctor 
WHERE doctor.lastname = "Shabado"), 
headdocstartdate = "2010-12-19" 
WHERE hoscode="BBC";

UPDATE hospital
SET headdoc = (SELECT licensenum FROM doctor	
WHERE doctor.lastname = "Aziz"), 
headdocstartdate = "2004-05-30"
WHERE hoscode="ABC";

UPDATE hospital
SET headdoc = (SELECT licensenum FROM doctor
WHERE doctor.lastname = "Spock"),
headdocstartdate = "2001-06-01"
WHERE hoscode="DDE";

SELECT * FROM hospital;


-- ---------
-- Part 2 SQL Inserts
INSERT INTO doctor VALUES ('WE22','Chris','Aberdeen','2001-02-14', 
'1977-09-06','ABC','Oncologist');
INSERT INTO patient VALUES ('12133223','Tom','Cruise','1959-12-24');
INSERT INTO looksafter VALUES ('WE22','12133223');
INSERT INTO hospital VALUES ('MGH','Montreal General', 'Montreal', 'QC', 
1600, "WE22", '2022-10-15');
select * from doctor;
select * from hospital;
select * from looksafter;
select * from patient;

-- ---------
-- Part 3 SQL Queries
-- Query 1
SELECT lastname FROM patient;
-- Query 2
SELECT DISTINCT lastname FROM patient;
-- Query 3
SELECT * FROM doctor ORDER BY lastname;
-- Query 4
SELECT hosname, hoscode FROM hospital WHERE numofbed > 1500;
-- Query 5
SELECT firstname, lastname 
FROM (doctor RIGHT OUTER JOIN hospital 
ON doctor.hosworksat=hospital.hoscode) 
WHERE hosname = "St. Joseph"; 
-- Query 6
SELECT firstname, lastname FROM patient WHERE lastname LIKE 'G%';
-- Query 7
SELECT patient.firstname AS "Patient First Name", patient.lastname 
AS "Patient last name"
FROM patient JOIN looksafter on patient.ohipnum = looksafter.ohipnum
JOIN doctor on doctor.licensenum = looksafter.licensenum 
WHERE doctor.lastname= "Webster";
-- Query 8
SELECT hosname, city, lastname FROM hospital, doctor
WHERE hospital.headdoc = doctor.licensenum;
--  Query 9
SELECT numofbed FROM hospital;
-- Query 10 
SELECT patient.firstname AS "Patient First Name", patient.lastname
AS "Patient last name", doctor.firstname AS "Doctor First Name", 
doctor.lastname AS "Doctor last name"
FROM patient JOIN looksafter on patient.ohipnum = looksafter.ohipnum
JOIN doctor ON doctor.licensenum = looksafter.licensenum
JOIN hospital ON hospital.headdoc = doctor.licensenum;
--  Query 11
SELECT DISTINCT firstname, lastname, prov FROM doctor, hospital 
WHERE (doctor.speciality = "Surgeon" 
AND hospital.hosname = "Victoria" AND hospital.hoscode = doctor.hosworksat);   
-- Query 12
SELECT firstname 
FROM doctor 
WHERE licensenum 
NOT IN (SELECT licensenum FROM looksafter);
--  Query 13
SELECT doctor.firstname, doctor.lastname, hosname, COUNT(ohipnum) 
AS 'Num of Patient' 
FROM doctor JOIN hospital 
ON doctor.hosworksat = hospital.hoscode 
JOIN looksafter 
ON doctor.licensenum = looksafter.licensenum
GROUP BY doctor.lastname
HAVING COUNT(ohipnum) >1; 
--  Query 14 
SELECT DISTINCT doctor.firstname AS "Doctor First Name", 
doctor.lastname AS "Doctor Last Name", 
h1.hosname AS "Head of Hospital Name",
h2.hosname AS "Works at Hospital Name"
FROM hospital h1, hospital h2, doctor 
WHERE (doctor.hosworksat = h2.hoscode)
AND (h1.hoscode != h2.hoscode) 
AND (h1.headdoc = doctor.licensenum);

      
--  Query 15
-- This query allows people to see how many doctors there is in each provinces
SELECT prov, count(licensenum) AS "Number of Doctors" 
FROM doctor JOIN hospital
ON doctor.hosworksat = hospital.hoscode
GROUP BY prov;



-- ---------
-- Part 4 SQL Views/Deletes
CREATE VIEW treatinginfo as SELECT doctor.firstname AS "dfirst", 
doctor.lastname AS "dlast",
doctor.birthdate AS "dbirth",
patient.firstname AS "pfirst", 
patient.lastname AS "plast",
patient.birthdate AS "pbirth"
FROM patient JOIN looksafter on patient.ohipnum = looksafter.ohipnum
JOIN doctor on doctor.licensenum = looksafter.licensenum;

SELECT * FROM treatinginfo;

SELECT dlast, dbirth, plast, pbirth FROM treatinginfo WHERE dbirth > pbirth;

SELECT * FROM patient;

SELECT * FROM looksafter;

DELETE FROM patient WHERE firstname LIKE "Tom" AND lastname LIKE "Cruise";
SELECT * FROM patient;
SELECT * FROM looksafter;

SELECT * FROM doctor;
DELETE FROM doctor WHERE firstname LIKE "Bernie";
SELECT * FROM doctor;

DELETE FROM doctor WHERE firstname LIKE "Chris" AND lastname LIKE "Aberdeen";
-- we cannot delete because the licensenum from the table doctor is also 
-- referenced as a foreign key in the lookafter table;
