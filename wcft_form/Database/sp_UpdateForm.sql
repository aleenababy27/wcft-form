CREATE PROCEDURE sp_UpdateForm
 @Id INT,
 @FirstName NVARCHAR(100),
 @Surname NVARCHAR(100),
 @DateOfBirth DATE,
 @Age INT,
 @Q1 INT, @Q2 INT, @Q3 INT, @Q4 INT, @Q5 INT, @Q6 INT, @Q7 INT, @Q8 INT, @Q9 INT, @Q10 INT, @Q11 INT, @Q12 INT,
 @TotalScore INT
AS
UPDATE NeuromodulationForms
SET FirstName=@FirstName, Surname=@Surname, DateOfBirth=@DateOfBirth, Age=@Age,
 Q1=@Q1, Q2=@Q2, Q3=@Q3, Q4=@Q4, Q5=@Q5, Q6=@Q6, Q7=@Q7, Q8=@Q8, Q9=@Q9, Q10=@Q10, Q11=@Q11, Q12=@Q12,
 TotalScore=@TotalScore
WHERE Id=@Id;
