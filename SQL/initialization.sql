CREATE TABLE Account (
    id INT PRIMARY KEY,
    account_password VARCHAR(255),
    email VARCHAR(255),
    creation_date DATE,
    username VARCHAR(255),
    account_rights VARCHAR(255),
    account_status VARCHAR(255)
);

CREATE TABLE User (
    id INT PRIMARY KEY,
    account_id INT,
    FOREIGN KEY (account_id) REFERENCES Account(id)
);

CREATE TABLE Article (
    id INT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    content TEXT,
    creation_date DATE,
    modification_date DATE,
    article_status VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES User(id)
);

CREATE TABLE Comment (
    id INT PRIMARY KEY,
    user_id INT,
    article_id INT,
    content TEXT,
    creation_date DATE,
    modification_date DATE,
    comment_status VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (article_id) REFERENCES Article(id)
);

CREATE TABLE BannedAccount (
    id INT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES User(id)
);

CREATE TABLE ReportedAccount (
    id INT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES User(id)
);
