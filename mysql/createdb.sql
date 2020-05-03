CREATE DATABASE IF NOT EXISTS `consiguelowdb` DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;


CREATE USER 'consiguelowdb'@'vm05.db.swarm.test' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'consiguelowdb'@'vm05.db.swarm.test' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;CREATE DATABASE IF NOT EXISTS `consiguelowdb`;GRANT ALL PRIVILEGES ON `consiguelowdb`.* TO 'consiguelowdb'@'vm05.db.swarm.test';