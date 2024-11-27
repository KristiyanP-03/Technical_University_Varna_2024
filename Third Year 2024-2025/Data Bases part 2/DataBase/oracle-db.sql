--TABLE CREATING----------------------------------------------------------------------------------------------------------------
CREATE TABLE Patient (
    Patient_ID INT PRIMARY KEY,
    Name VARCHAR(20) NOT NULL,
    EGN CHAR(10) UNIQUE NOT NULL
);

CREATE TABLE Specialties (
    Specialty_ID INT PRIMARY KEY,
    Title VARCHAR2(30) NOT NULL
);

CREATE TABLE Doctor (
    Doctor_ID INT PRIMARY KEY,
    Specialty_ID INT,
    Name VARCHAR(20) NOT NULL,
    Phone VARCHAR(20),
    FOREIGN KEY (Specialty_ID) REFERENCES Specialties(Specialty_ID)
);

CREATE TABLE Treatment_Diagnosis (
    Diagnosis_ID INT PRIMARY KEY,
    Description VARCHAR(60) NOT NULL
);

CREATE TABLE Treatment (
    Treatment_ID INT PRIMARY KEY,
    Patient_ID INT,
    Doctor_ID INT,
    Treatment_Date DATE NOT NULL,
    Duration INT,
    Diagnosis_ID INT,
    FOREIGN KEY (Patient_ID) REFERENCES Patient(Patient_ID),
    FOREIGN KEY (Doctor_ID) REFERENCES Doctor(Doctor_ID),
    FOREIGN KEY (Diagnosis_ID) REFERENCES Treatment_Diagnosis(Diagnosis_ID)
);
--------------------------------------------------------------------------------------------------------------------------------





--DATA--------------------------------------------------------------------------------------------------------------------------
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (1, 'Patient1', '100000001');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (2, 'Patient2', '100000002');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (3, 'Patient3', '100000003');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (4, 'Patient4', '100000004');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (5, 'Patient5', '100000005');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (6, 'Patient6', '100000006');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (7, 'Patient7', '100000007');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (8, 'Patient8', '100000008');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (9, 'Patient9', '100000009');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (10, 'Patient10', '1000000010');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (11, 'Patient11', '100000011');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (12, 'Patient12', '100000012');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (13, 'Patient13', '100000013');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (14, 'Patient14', '100000014');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (15, 'Patient15', '100000015');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (16, 'Patient16', '100000016');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (17, 'Patient17', '100000017');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (18, 'Patient18', '100000018');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (19, 'Patient19', '100000019');
INSERT INTO Patient (Patient_ID, Name, EGN) 
VALUES (20, 'Patient20', '1000000020');

INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (1, 'Specialty1');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (2, 'Specialty2');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (3, 'Specialty3');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (4, 'Specialty4');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (5, 'Specialty5');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (6, 'Specialty6');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (7, 'Specialty7');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (8, 'Specialty8');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (9, 'Specialty9');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (10, 'Specialty10');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (11, 'Specialty11');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (12, 'Specialty12');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (13, 'Specialty13');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (14, 'Specialty14');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (15, 'Specialty15');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (16, 'Specialty16');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (17, 'Specialty17');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (18, 'Specialty18');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (19, 'Specialty19');
INSERT INTO Specialties (Specialty_ID, Title) 
VALUES (20, 'Specialty20');

INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (1, 1, 'Doctor1', '0880000001');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (2, 2, 'Doctor2', '0880000002');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (3, 3, 'Doctor3', '0880000003');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (4, 4, 'Doctor4', '0880000004');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (5, 5, 'Doctor5', '0880000005');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (6, 6, 'Doctor6', '0880000006');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (7, 7, 'Doctor7', '0880000007');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (8, 8, 'Doctor8', '0880000008');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (9, 9, 'Doctor9', '0880000009');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (10, 10, 'Doctor10', '0880000010');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (11, 11, 'Doctor11', '0880000011');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (12, 12, 'Doctor12', '0880000012');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (13, 13, 'Doctor13', '0880000013');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (14, 14, 'Doctor14', '0880000014');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (15, 15, 'Doctor15', '0880000015');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (16, 16, 'Doctor16', '0880000016');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (17, 17, 'Doctor17', '0880000017');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (18, 18, 'Doctor18', '0880000018');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (19, 19, 'Doctor19', '0880000019');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) 
VALUES (20, 20, 'Doctor20', '0880000020');

INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (1, 'Diagnosis1');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (2, 'Diagnosis2');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (3, 'Diagnosis3');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (4, 'Diagnosis4');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (5, 'Diagnosis5');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (6, 'Diagnosis6');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (7, 'Diagnosis7');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (8, 'Diagnosis8');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (9, 'Diagnosis9');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (10, 'Diagnosis10');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (11, 'Diagnosis11');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (12, 'Diagnosis12');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (13, 'Diagnosis13');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (14, 'Diagnosis14');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (15, 'Diagnosis15');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (16, 'Diagnosis16');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (17, 'Diagnosis17');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (18, 'Diagnosis18');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (19, 'Diagnosis19');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) 
VALUES (20, 'Diagnosis20');

INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (1, 1, 1, TO_DATE('2023-01-01', 'YYYY-MM-DD'), 30, 1);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (2, 2, 2, TO_DATE('2023-02-01', 'YYYY-MM-DD'), 15, 2);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (3, 3, 3, TO_DATE('2023-03-01', 'YYYY-MM-DD'), 20, 3);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (4, 4, 4, TO_DATE('2023-04-01', 'YYYY-MM-DD'), 10, 4);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (5, 5, 5, TO_DATE('2023-05-01', 'YYYY-MM-DD'), 25, 5);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (6, 6, 6, TO_DATE('2023-06-01', 'YYYY-MM-DD'), 18, 6);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (7, 7, 7, TO_DATE('2023-07-01', 'YYYY-MM-DD'), 15, 7);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (8, 8, 8, TO_DATE('2023-08-01', 'YYYY-MM-DD'), 20, 8);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (9, 9, 9, TO_DATE('2023-09-01', 'YYYY-MM-DD'), 10, 9);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (10, 10, 10, TO_DATE('2023-10-01', 'YYYY-MM-DD'), 25, 10);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (11, 11, 11, TO_DATE('2023-11-01', 'YYYY-MM-DD'), 30, 11);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (12, 12, 12, TO_DATE('2023-12-01', 'YYYY-MM-DD'), 15, 12);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (13, 13, 13, TO_DATE('2023-11-01', 'YYYY-MM-DD'), 20, 13);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (14, 14, 14, TO_DATE('2023-10-01', 'YYYY-MM-DD'), 10, 14);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (15, 15, 15, TO_DATE('2023-09-01', 'YYYY-MM-DD'), 25, 15);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (16, 16, 16, TO_DATE('2023-08-01', 'YYYY-MM-DD'), 18, 16);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (17, 17, 17, TO_DATE('2023-07-01', 'YYYY-MM-DD'), 15, 17);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (18, 18, 18, TO_DATE('2023-06-01', 'YYYY-MM-DD'), 20, 18);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (19, 19, 19, TO_DATE('2023-05-01', 'YYYY-MM-DD'), 10, 19);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (20, 20, 20, TO_DATE('2023-04-01', 'YYYY-MM-DD'), 25, 20);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (21, 1, 2, TO_DATE('2023-02-01', 'YYYY-MM-DD'), 30, 2);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (22, 1, 3, TO_DATE('2023-03-01', 'YYYY-MM-DD'), 25, 3);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (23, 1, 4, TO_DATE('2023-04-01', 'YYYY-MM-DD'), 15, 4);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (24, 1, 5, TO_DATE('2023-05-01', 'YYYY-MM-DD'), 30, 5);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (25, 1, 6, TO_DATE('2023-06-01', 'YYYY-MM-DD'), 20, 6);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (26, 1, 7, TO_DATE('2023-07-01', 'YYYY-MM-DD'), 18, 7);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (27, 1, 8, TO_DATE('2023-08-01', 'YYYY-MM-DD'), 25, 8);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (28, 2, 9, TO_DATE('2023-02-15', 'YYYY-MM-DD'), 14, 9);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (29, 3, 10, TO_DATE('2023-03-10', 'YYYY-MM-DD'), 21, 10);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (30, 4, 11, TO_DATE('2023-04-20', 'YYYY-MM-DD'), 12, 11);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (31, 5, 12, TO_DATE('2023-05-25', 'YYYY-MM-DD'), 28, 12);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (32, 6, 13, TO_DATE('2023-06-05', 'YYYY-MM-DD'), 17, 13);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (33, 7, 1, TO_DATE('2023-07-15', 'YYYY-MM-DD'), 22, 14);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (38, 8, 1, TO_DATE('2023-08-25', 'YYYY-MM-DD'), 13, 15);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (39, 9, 1, TO_DATE('2023-09-15', 'YYYY-MM-DD'), 19, 16);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (40, 10, 1, TO_DATE('2023-10-05', 'YYYY-MM-DD'), 20, 17);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (41, 11, 1, TO_DATE('2023-11-10', 'YYYY-MM-DD'), 18, 18);
--------------------------------------------------------------------------------------------------------------------------------





--UPDATES-----------------------------------------------------------------------------------------------------------------------
--Patient
UPDATE Patient 
SET Name = 'Patient Updated',
    EGN = '222000001'
WHERE Patient_ID = 1;

--Doctor
UPDATE Doctor 
SET Name = 'Doctor1 Updated',
    Phone = '0878888881',
    Specialty_ID = 4
WHERE Doctor_ID = 1;

--Specialties
UPDATE Specialties 
SET Title = 'Specialty1 Updated'
WHERE Specialty_ID = 1;

--Treatment_Diagnosis
UPDATE Treatment_Diagnosis 
SET Description = 'Updated'
WHERE Diagnosis_ID = 1;

--Treatment
UPDATE Treatment
SET Treatment_Date = TO_DATE('2023-08-01', 'YYYY-MM-DD'),
    Duration = 25,                                  
    Diagnosis_ID = 4,                                 
    Patient_ID = 2,                               
    Doctor_ID = 3                                      
WHERE Treatment_ID = 1;  
--------------------------------------------------------------------------------------------------------------------------------





--Turseniq-----------------------------------------------------------------------------------------------------------------------
-- po pacient
SELECT Patient.Name AS pName, Doctor.Name AS Doctor, 
       Treatment.Treatment_Date AS tDate, Treatment.Duration, Treatment_Diagnosis.Description AS DDescr
FROM Treatment
JOIN Patient ON Treatment.Patient_ID = Patient.Patient_ID
JOIN Doctor ON Treatment.Doctor_ID = Doctor.Doctor_ID
JOIN Treatment_Diagnosis ON Treatment.Diagnosis_ID = Treatment_Diagnosis.Diagnosis_ID
WHERE Patient.Name = 'Patient1'
ORDER BY Treatment.Treatment_Date;


-- po lekar
SELECT Doctor.Name AS dName, Patient.Name AS Patient, 
       Treatment.Treatment_Date AS tDate, Treatment.Duration, Treatment_Diagnosis.Description AS DDescr
FROM Treatment
JOIN Patient ON Treatment.Patient_ID = Patient.Patient_ID
JOIN Doctor ON Treatment.Doctor_ID = Doctor.Doctor_ID
JOIN Treatment_Diagnosis ON Treatment.Diagnosis_ID = Treatment_Diagnosis.Diagnosis_ID
WHERE Doctor.Name = 'Doctor1'
ORDER BY Treatment.Treatment_Date;

-- po diagnoza
SELECT Treatment_Diagnosis.Description AS Diagnosis, Patient.Name AS Patient_Name, Doctor.Name AS Doctor_Name, 
       Treatment.Treatment_Date AS tDate, Treatment.Duration
FROM Treatment
JOIN Patient ON Treatment.Patient_ID = Patient.Patient_ID
JOIN Doctor ON Treatment.Doctor_ID = Doctor.Doctor_ID
JOIN Treatment_Diagnosis ON Treatment.Diagnosis_ID = Treatment_Diagnosis.Diagnosis_ID
WHERE Treatment_Diagnosis.Description = 'Diagnosis1'
ORDER BY Treatment.Treatment_Date;
--------------------------------------------------------------------------------------------------------------------------------





--Spravki-----------------------------------------------------------------------------------------------------------------------
-- Lechenie na pacient, podredeni po data
SELECT Treatment.Treatment_ID, Patient.Name AS Patient_Name, Doctor.Name AS Doctor_Name, 
       Treatment_Diagnosis.Description AS Diagnosis, Treatment.Treatment_Date, Treatment.Duration
FROM Treatment
JOIN Patient ON Treatment.Patient_ID = Patient.Patient_ID
JOIN Doctor ON Treatment.Doctor_ID = Doctor.Doctor_ID
JOIN Treatment_Diagnosis ON Treatment.Diagnosis_ID = Treatment_Diagnosis.Diagnosis_ID
WHERE Patient.Name = 'Patient1'
ORDER BY Treatment.Treatment_Date;


-- lechenie za lekar, podredeni po diagnoza
SELECT Treatment.Treatment_ID, Doctor.Name AS Doctor_Name, Patient.Name AS Patient_Name, 
       Treatment_Diagnosis.Description AS Diagnosis, Treatment.Treatment_Date, Treatment.Duration
FROM Treatment
JOIN Patient ON Treatment.Patient_ID = Patient.Patient_ID
JOIN Doctor ON Treatment.Doctor_ID = Doctor.Doctor_ID
JOIN Treatment_Diagnosis ON Treatment.Diagnosis_ID = Treatment_Diagnosis.Diagnosis_ID
WHERE Doctor.Name = 'Doctor1'
ORDER BY Treatment_Diagnosis.Description;


--Vsichki lecheniq za perioda
SELECT Treatment.Treatment_ID, Patient.Name AS Patient_Name, Doctor.Name AS Doctor_Name, 
       Treatment_Diagnosis.Description AS Diagnosis, Treatment.Treatment_Date, Treatment.Duration
FROM Treatment
JOIN Patient ON Treatment.Patient_ID = Patient.Patient_ID
JOIN Doctor ON Treatment.Doctor_ID = Doctor.Doctor_ID
JOIN Treatment_Diagnosis ON Treatment.Diagnosis_ID = Treatment_Diagnosis.Diagnosis_ID
WHERE Treatment.Treatment_Date BETWEEN TO_DATE('2023-03-01', 'YYYY-MM-DD') AND TO_DATE('2023-12-31', 'YYYY-MM-DD')
ORDER BY Treatment.Treatment_Date;
--------------------------------------------------------------------------------------------------------------------------------





--DELETE EVERYTHING-------------------------------------------------------------------------------------------------------------
DROP TABLE Treatment;
DROP TABLE Treatment_Diagnosis;
DROP TABLE Doctor;
DROP TABLE Specialties;
DROP TABLE Patient;
--------------------------------------------------------------------------------------------------------------------------------




