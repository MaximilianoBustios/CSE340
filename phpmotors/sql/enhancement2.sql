--1 query
INSERT INTO clients (clientFirstName, clientLastName, clientEmail, clientPassword, comment) 
VALUES ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 'I am the real Ironman');

--2nd query
UPDATE clients
SET clientLevel = '3'
WHERE clientFirstName = "Tony" AND clientLastName = "Stark";

--3rd query
UPDATE inventory
SET invDescription = REPLACE(invDescription, 'small interior', 'spacious interior')
WHERE invId = 12;

--4th query
SELECT inventory.invModel, carclassification.classificationName
FROM inventory
INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId
WHERE carclassification.classificationName = "SUV";

--5th query
DELETE FROM inventory 
WHERE inventory.invModel='Wrangler' AND inventory.invMake='Jeep';


--6th query
UPDATE inventory
SET inventory.invImage = concat('phpmotors', invImage), inventory.invThumbnail = concat('phpmotors', invThumbnail);