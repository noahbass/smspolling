## sms polling

An open source text message (sms) cli poll service running through Google Voice. A command-line php app.

### Usage

```
$ composer install
```

Create `.env` with your Google credentials specified in `.env.example`.

Create `db.db` to store responses.

### API

Use `php app <command> <args>`.

#### `db/migrate`

Drop and create tables in the database.

#### `poll/open`

Open the poll by deleting any existing messages and removing responses from the table.

#### `poll/close <args>`

Close the poll and calculate and print the results. `<args>` are the options that you want to check in your poll.

Example: If your poll options are 'bears' and 'cows', then run `php app poll/close bears cows`.

#### `responses/get`

Check for new responses and insert those responses into the table.

#### `responses/list`

List out responses that have been saved in the table
