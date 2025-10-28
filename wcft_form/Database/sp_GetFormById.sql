CREATE PROCEDURE sp_GetFormById
    @Id INT
AS
BEGIN
    SELECT * FROM NeuromodulationForms WHERE Id = @Id;
END
