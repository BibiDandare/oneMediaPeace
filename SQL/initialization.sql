CREATE TABLE Account (
    id INT PRIMARY KEY,
    account_password VARCHAR(255),
    email VARCHAR(255),
    creation_date DATE,
    username VARCHAR(255),
    account_rights VARCHAR(255),
    banned BOOLEAN,
    reported BOOLEAN,
    active BOOLEAN /* new */
);


CREATE TABLE Article (
    id INT PRIMARY KEY,
    account_id INT,
    title VARCHAR(255),
    content TEXT,
    creation_date DATE,
    modification_date DATE,
    moderated BOOLEAN,
    deleted BOOLEAN,
    public BOOLEAN, /* new */
    active BOOLEAN, /* new */
    FOREIGN KEY (account_id) REFERENCES Account(id)
);

CREATE TABLE Comment (
    id INT PRIMARY KEY,
    account_id INT,
    article_id INT,
    content TEXT,
    creation_date DATE,
    modification_date DATE,
    moderated BOOLEAN,
    deleted BOOLEAN,
    public BOOLEAN, /* new */
    active BOOLEAN, /* new */
    FOREIGN KEY (account_id) REFERENCES Account(id),
    FOREIGN KEY (article_id) REFERENCES Article(id)
);