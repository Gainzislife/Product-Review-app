/**
 * Database creation script
 */
DROP DATABASE IF EXISTS yuppie;
CREATE DATABASE yuppie;
USE yuppie;

CREATE TABLE products(
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(1000) NOT NULL,
    PRIMARY KEY(id)
);

-- create products table
INSERT INTO products(
    name,
    description
)
VALUES(
    "Product 1",
    "This is the description of the first product.
	Isn't it a nice product?"
);

INSERT INTO products(
    name,
    description
)
VALUES(
    "Product 2",
    "This is the description of the second product.
	Is it better than the first?"
);

INSERT INTO products(
    name,
    description
)
VALUES(
    "Product 3",
    "This is the body of the third product.
	It is a good product."
);

-- create review table
CREATE TABLE reviews(
    id INT AUTO_INCREMENT NOT NULL,
	product_id INT NOT NULL,
    rating INT NOT NULL,
	name VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
    text VARCHAR(255),
    PRIMARY KEY(id)
);

INSERT INTO reviews(
    product_id,
    rating,
    name,
    email,
    text
)
VALUES(
    1,
    3,
    'Jimmy',
    'jimmy@mail.com',
    "This is Jimmy's contribution"
);

INSERT INTO reviews(
    product_id,
    rating,
    name,
    email,
    text
)
VALUES(
    2,
    4,
    'Jane',
    'jane@hotmail.com',
    "This is a comment from Jane"
);

INSERT INTO reviews(
    product_id,
    rating,
    name,
    email,
    text
)
VALUES(
    3,
    4,
    'Dana',
    'dana@mailing.com',
    "This is a comment from Dana"
);