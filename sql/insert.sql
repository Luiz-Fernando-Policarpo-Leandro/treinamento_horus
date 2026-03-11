use treinamento;

INSERT INTO estado (sigla, nome)
SELECT 'AC', 'Acre'
WHERE NOT EXISTS (
    SELECT 1 FROM estado WHERE sigla = 'AC'
);

INSERT INTO cidade (nome, id_estado)
SELECT 'Rio Branco', id
FROM estado
WHERE sigla = 'AC'
AND NOT EXISTS (
    SELECT 1 FROM cidade WHERE nome = 'Rio Branco'
);

INSERT INTO estado (sigla, nome)
SELECT 'AL', 'Alagoas'
WHERE NOT EXISTS (
    SELECT 1 FROM estado WHERE sigla = 'AL'
);

INSERT INTO cidade (nome, id_estado)
SELECT 'Maceió', id
FROM estado
WHERE sigla = 'AL'
AND NOT EXISTS (
    SELECT 1 FROM cidade WHERE nome = 'Maceió'
);