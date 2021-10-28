## INSTRUCTIONS


run `yarn install` inside frontend folder.
run `composer install` inside backend folder.

copy `backend/.env.example` to `backend/,env`  it has the db configs in there.

Run `docker-compose up` to start the application.

Go to `http://localhost:9001` to access adminer.

Login with the following details
`System -> MySQL`

`Server -> mysql`

`Username -> root`

`Password -> root`

`database -> roomraccoon`

Add the following table:

### Table 1
`Table name : listItem`

`id : int (auto increment)`

`listId : int`

`name: varchar (255)`

`checked: tinyint`

### Table 2
`Table name : list`

`id : int (auto increment)`

`name: varchar (255)`

There should be no foreign keys