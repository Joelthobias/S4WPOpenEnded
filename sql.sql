DROP TABLE IF EXISTS Attendance;

DROP TABLE IF EXISTS S4_CT;

CREATE TABLE S4_CT (
    ID DECIMAL(10, 0),
    name VARCHAR(25),
    semester INT DEFAULT 4,
    course VARCHAR(35) DEFAULT 'Computer Engineering',
    PRIMARY KEY (ID) -- Add primary key constraint
);

CREATE TABLE Attendance (
    id DECIMAL(10, 0),
    date DATE,
    hour INT,
    status BOOLEAN,
    FOREIGN KEY (id) REFERENCES S4_CT(ID),
    CONSTRAINT check_hour_range CHECK (
        hour >= 1
        AND hour <= 6
    ),
    CONSTRAINT unique_attendance_entry UNIQUE (id, date, hour)
);
