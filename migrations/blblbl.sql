CREATE OR REPLACE VIEW V_SCORE
AS SELECT 
id, 
pseudo, 
(1000000 - (500000/(nb_cartes/2) * ((nb_cartes/2) - (nb_tenta - (nb_cartes/2)))) - (500000 - temps * 2)) as score
nb_cartes,
nb_tenta,
temps
FROM record;

