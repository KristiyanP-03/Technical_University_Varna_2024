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






INSERT INTO Patient (Patient_ID, Name, EGN) VALUES (1, 'Ivan Ivanov', '1234567890');
INSERT INTO Patient (Patient_ID, Name, EGN) VALUES (2, 'Maria Petrova', '0987654321');
INSERT INTO Patient (Patient_ID, Name, EGN) VALUES (3, 'Georgi Georgiev', '1122334455');
INSERT INTO Patient (Patient_ID, Name, EGN) VALUES (4, 'Anna Marinova', '2233445566');
INSERT INTO Patient (Patient_ID, Name, EGN) VALUES (5, 'Petar Dimitrov', '3344556677');


INSERT INTO Specialties (Specialty_ID, Title) VALUES (1, '???????????');
INSERT INTO Specialties (Specialty_ID, Title) VALUES (2, '??????????');
INSERT INTO Specialties (Specialty_ID, Title) VALUES (3, '?????????');
INSERT INTO Specialties (Specialty_ID, Title) VALUES (4, '????????????');
INSERT INTO Specialties (Specialty_ID, Title) VALUES (5, '?????????????????');


INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) VALUES (1, 1, 'Dr. Georgiev', '0888123456');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) VALUES (2, 2, 'Dr. Dimitrova', '0888234567');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) VALUES (3, 3, 'Dr. Ivanova', '0888345678');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) VALUES (4, 4, 'Dr. Petrova', '0888456789');
INSERT INTO Doctor (Doctor_ID, Specialty_ID, Name, Phone) VALUES (5, 5, 'Dr. Stoyanov', '0888567890');


INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) VALUES (1, '??????????');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) VALUES (2, '???????');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) VALUES (3, '??????');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) VALUES (4, '??????');
INSERT INTO Treatment_Diagnosis (Diagnosis_ID, Description) VALUES (5, '???????');


INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (1, 1, 1, TO_DATE('2023-01-15', 'YYYY-MM-DD'), 30, 1);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (2, 2, 2, TO_DATE('2023-02-20', 'YYYY-MM-DD'), 15, 2);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (3, 3, 3, TO_DATE('2023-03-25', 'YYYY-MM-DD'), 20, 3);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (4, 4, 4, TO_DATE('2023-04-10', 'YYYY-MM-DD'), 10, 4);
INSERT INTO Treatment (Treatment_ID, Patient_ID, Doctor_ID, Treatment_Date, Duration, Diagnosis_ID)
VALUES (5, 5, 5, TO_DATE('2023-05-15', 'YYYY-MM-DD'), 25, 5);






