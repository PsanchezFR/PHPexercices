-- SUPPRESSION DU COURS D'AIKIDO

DELETE FROM session 
WHERE session.idsession = 2 
AND session.activite_idactivite = 5 
AND session.adherent_idprofesseur = 34;

-- PASSER ANTOINE BALZER EN DIRIGEANT

UPDATE adherent 
SET statut = 'dirigeant' 
WHERE adherent.idadherent = 33;

-- AFFICHER LA LISTE DES PROFS ET LEURS ACTIVITES

SELECT adherent_idprofesseur, activite_idactivite
FROM session;

-- AFFICHER LES ACTIVITES DE LA SEMAINE AVEC LE DETAIL DES PARTICIPANTS

SELECT  adherent_has_session.adherent_idadherent, `session`.idsession, adherent.nom, adherent.prenom
FROM adherent_has_session
INNER JOIN `session` 
ON `session`.idsession = adherent_has_session.session_idsession
INNER JOIN adherent 
ON adherent.idadherent = adherent_has_session.adherent_idadherent
WHERE `session`.date BETWEEN CURDATE() AND CURDATE() + 7		# il est possible d'utiliser week pour retrouver la semaine exacte.
ORDER BY `session`.idsession, adherent.nom, adherent.prenom, `session`.date ASC
