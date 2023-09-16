-- data table roles
alter table roles auto_increment = 1;
insert into roles values(null, "Administrateur", "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into roles values(null, "Utilisateur", "2023-07-13 15:04:00", "2023-07-13 15:04:00");


-- data table users 
alter table users auto_increment = 1;
insert into users values(null, "ANDRIANARIVO", "Pierre Emmanuel", "andrianarivo24@gmail.com", null, "$2y$10$JLnlNEcnrhXJxdAqJeX77egjPxe2NjkFA/OCqOVWnVjYYGTikKi/m", "Validé", 1, null, "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into users values(null, "NOMENJANAHARY", "Manuel", "nomenjanahary@gmail.com", null, "$2y$10$F6cdRlCDLCGDe9Ugep8gPuE673k29Gu/uylpTcQmZxtSfpWMQP2Q6", "Validé", 2, null, "2023-07-13 15:04:00", "2023-07-13 15:04:00");


-- data tables clients
alter table clients auto_increment = 1;
insert into clients values(null, "RAKOTONIRINA", "Julia", "333123345666", "Femme", "261", "347789055", "261", "325643211", "Ambanidia", "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into clients values(null, "RAKOTO", "Eliot", "333123345777", "Homme", "261", "324567899", "261", "341234566", "Tanjombato", "2023-07-13 15:04:00", "2023-07-13 15:04:00");


-- data table type_tarifs
alter table type_tarifs auto_increment = 1;
insert into type_tarifs values(null, "Prénimum", "2023-07-13 15:04:00", "2023-07-13 15:04:00");


-- data table tarifs
alter table tarifs auto_increment = 1;
insert into tarifs values(null, "Antananarivo", "Toamasina", 150000, 1, "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into tarifs values(null, "Antananarivo", "Mahajanga", 200000, 1, "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into tarifs values(null, "Antananarivo", "Toliara", 250000, 1, "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into tarifs values(null, "Antananarivo", "Antsiranana", 300000, 1, "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into tarifs values(null, "Antananarivo", "Fianaratsoa", 500000, 1, "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into tarifs values(null, "Antananarivo", "Paris", 4000000, 1, "2023-07-13 15:04:00", "2023-07-13 15:04:00");


-- data talbes classe_avions
alter table classe_avions auto_increment = 1;
insert into classe_avions values(null, "Affaire", "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into classe_avions values(null, "Economique", "2023-07-13 15:04:00", "2023-07-13 15:04:00");


-- data table modele_avions
alter table modele_avions auto_increment = 1;
insert into modele_avions values(null, "Airbus A380", "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into modele_avions values(null, "Boeing 707", "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into modele_avions values(null, "Airbus A320", "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into modele_avions values(null, "Boeing 727", "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into modele_avions values(null, "Boeing 707", "2023-07-13 15:04:00", "2023-07-13 15:04:00");
insert into modele_avions values(null, "Boeing 767", "2023-07-13 15:04:00", "2023-07-13 15:04:00");



