CREATE PROCEDURE sp_GetForms
AS
BEGIN
    SELECT * FROM NeuromodulationForms ORDER BY CreatedAt DESC;
END
