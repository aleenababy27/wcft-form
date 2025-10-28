CREATE PROCEDURE sp_DeleteForm
 @Id INT
AS
DELETE FROM NeuromodulationForms WHERE Id = @Id;
