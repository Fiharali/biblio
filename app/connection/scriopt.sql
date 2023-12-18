create DATABASE biblio;
use biblio;
CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(255),
    lastName varchar(255),
    email varchar(255),
    password varchar(255),
    phone varchar(255),
    budget float
);
CREATE TABLE roles (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255)
);
CREATE TABLE users_role (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    role_id int,
    Foreign Key (user_id) REFERENCES users(id),
    Foreign Key (role_id) REFERENCES roles(id)
);
CREATE TABLE books (
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(255),
    author varchar(255),
    genre varchar(255),
    description text,
    publication_year date,
    total_copies int,
    available_copies int
);
CREATE TABLE reservations (
    id int PRIMARY KEY AUTO_INCREMENT,
    description text,
    reservation_date date,
    return_date date,
    is_returned int,
    user_id int,
    book_id int,
    Foreign Key (user_id) REFERENCES users(id),
    Foreign Key (book_id) REFERENCES books(id)
);