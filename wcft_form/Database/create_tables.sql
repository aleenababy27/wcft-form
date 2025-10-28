CREATE TABLE NeuromodulationForms (
    Id INT IDENTITY(1,1) PRIMARY KEY,
    FirstName NVARCHAR(100),
    Surname NVARCHAR(100),
    DateOfBirth DATE,
    Age INT,
    Q1 INT, Q2 INT, Q3 INT, Q4 INT, Q5 INT, Q6 INT, Q7 INT, Q8 INT, Q9 INT, Q10 INT, Q11 INT, Q12 INT,
    TotalScore INT,
    CreatedAt DATETIME DEFAULT GETDATE()
);
