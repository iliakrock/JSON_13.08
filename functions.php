<?php

const USERS_FILE = 'users.json';

function showHTML()
{
    $html = '
    <html>
        <head></head>
        <body>

            <form action="http://localhost:9000/rand.php" method="POST">
                <input type="number" min="1" max="100" name="number" placeholder="Enter number 1-100">
                <input type="submit" value="Send">
            </form>
        </body>
    </html>';

    echo $html;
}

function makeGuess()
{
    $number = (int) $_POST['number'];

    if ($number < 1 || $number > 100 || !is_numeric($_POST['number'])) {
        die("Wrong data given. We accept only integers in range of 1 to 100");
    }

    $counter = 0;

    do {
        $rand = rand(1,100);
        $counter++;
    } while ($number !== $rand);

    echo "I found $number from $counter attempt. Computer number $rand";
}

function showTableForm()
{
    $html = '
    <form action="http://localhost:9000?action=create" method="POST">
        <input type="text" name="name" placeholder="Your name">
        <input type="text" name="phone" placeholder="+380631234567">
        <input type="submit" name="Submit">
    </form>
    ';

    echo $html;
}

function showContactBook()
{
    $html = '
    <table border="1">
    <thead>
        <th>Name</th>    
        <th>Phone</th>   
        <th>Image</th>
    </thead>
    <tbody>';

    foreach (getContacts() as $contact) {
        $html .= "<tr><td>{$contact['name']}</td><td>{$contact['phone']}</td><td><img src='images/1.png' width='200'></td></tr>";
    }

    $html .= '</tbody></table>';

    echo $html;
}

function getContacts(): array
{
    $jsonString = file_get_contents(USERS_FILE);

    return json_decode($jsonString, true) ?? [];
}

function createContact(string $name, string $phone) {
    $users = getContacts();
    $users[] = [
        'name' => $name,
        'phone' => $phone
    ];
    writeUsersToFile($users);
}

function writeUsersToFile(array $users)
{
    $json = json_encode($users);

    file_put_contents(USERS_FILE, $json);
}