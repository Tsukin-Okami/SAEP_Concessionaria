use concessionaria;

INSERT INTO concessionaria(nome) VALUES 
("Atena"),("Demétir"),("Hera"),("Estia"),("Perséfone");

INSERT INTO cliente(nome, sobrenome, cpf) VALUES 
("Adalberto", "Martins da Silva", 94583712345),
("Adan", "Roger Guimarães Dias", 78123456789),
("Adão", "Walter Gomes de Sousa", 65247893101),
("Adelson", "Fernandes Sena", 34950681234),
("Ademir", "Augusto Simões", 45367890123),
("Ademir", "Borges dos Santos", 89012345678),
("Adilio", "José da Silva Santos", 76249813057),
("Adriana", "Ferreira de Lima Teodoro", 12567893456),
("Adriano", "Bezerra Apolinario", 47896512340),
("Adriano", "Heleno Basso", 34058729101),
("Adriano", "Lourenço do Rego", 90847261580),
("Adriano", "Matos Santos", 78123950467),
("Adriano", "Pires Caetano", 24683105749),
("Adriano", "Prada de Campos", 65819247023),
("Adriel", "Alberto dos Santos", 37205681914),
("Agner", "Vinicius Marques de Camargo", 59076248132),
("Agrinaldo", "Ferreira Soares", 82057361945),
("Alan", "Jhonnes Banlian da Silva e Sá", 71583629407),
("Alberto", "Ramos Rodrigues", 93812467503),
("Alcides", "José Ramos", 64130572890),
("Aldemir", "SantAna dos Santos", 52147396058),
("Aleksandro", "Marcelo da Silva", 67089213456),
("Alessandro", "Martins Silva", 54312768029),
("Alessandro", "Sanches", 87469251036),
("Alex", "dos Reis de Jesus", 23169854702),
("Alex", "Ferreira Soares", 92018367459),
("Alex", "Sandro Oliveira", 53719086427),
("Alex", "Souza Farias", 31468907251),
("Alexandra", "de Lima Silva", 80652419370),
("Alexandre", "Clemente da Costa", 95738164025);

INSERT INTO area(id) VALUES 
(1),(2),(4),(7),(8),(9),(10);

INSERT INTO automovel(nome, preco, area_id, concessionaria_id) VALUES
("Fiat Strada", 43115, 1, 1),
("Fiat Argo", 47660, 2, 2),
("Fiat Mobi", 32102, 4, 3),
("Jeep Compass", 34950, 7, 4),
("Hyundai HB20", 49302, 8, 5),
("Jeep Renegade", 36661, 9, 1),
("Volkswagen T-Cross", 38182, 10, 2),
("Fiat Toro", 57733, 1, 3),
("Hyundai Creta", 55998, 2, 4),
("Chevrolet S10", 51035, 4, 5),
("Toyota Corolla Cross", 34544, 7, 1),
("Toyota Hilux", 53937, 8, 2),
("Toyota Corolla", 55022, 9, 3),
("Volkswagen Gol", 48253, 10, 4),
("Honda HR-V", 53438, 1, 5),
("Renault Kwid", 31810, 2, 1),
("Volkswagen Nivus", 35104, 4, 2),
("Hyundai HB20S", 31855, 7, 3),
("Ford Ranger", 48927, 8, 4),
("Fiat Uno", 38111, 9, 5),
("Fiat Cronos", 36515, 10, 1),
("Citroën C4 Cactus", 53654, 1, 2),
("Toyota Yaris Hatchback", 55869, 2, 3),
("Volkswagen Voyage", 30954, 4, 4),
("Honda Civic", 30871, 7, 5),
("Volkswagen Saveiro", 32306, 8, 1),
("Caoa Chery Tiggo 5x", 30069, 9, 2),
("Volkswagen Virtus", 40689, 10, 3),
("Fiat Grand Siena", 33469, 1, 4),
("Caoa Chery Tiggo 8", 48481, 2, 5),
("Chevrolet Tracker", 30648, 4, 1),
("Peugeot 208", 46934, 7, 2),
("Toyota SW4", 54252, 8, 3),
("Nissan Frontier", 32596, 9, 4),
("Honda WR-V", 35139, 10, 5),
("Volkswagen Taos", 47546, 1, 1),
("Mitsubishi L200", 57049, 2, 2),
("Renault Oroch", 48756, 4, 3),
("Toyota Yaris Sedan", 43077, 7, 4),
("Renault Duster", 52641, 8, 5);