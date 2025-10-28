CREATE PROCEDURE sp_InsertForm
 @FirstName NVARCHAR(100),
 @Surname NVARCHAR(100),
 @DateOfBirth DATE,
 @Age INT,
 @Q1 INT, @Q2 INT, @Q3 INT, @Q4 INT, @Q5 INT, @Q6 INT, @Q7 INT, @Q8 INT, @Q9 INT, @Q10 INT, @Q11 INT, @Q12 INT,
 @TotalScore INT
AS
INSERT INTO NeuromodulationForms (FirstName,Surname,DateOfBirth,Age,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Q11,Q12,TotalScore)
VALUES (@FirstName,@Surname,@DateOfBirth,@Age,@Q1,@Q2,@Q3,@Q4,@Q5,@Q6,@Q7,@Q8,@Q9,@Q10,@Q11,@Q12,@TotalScore);
