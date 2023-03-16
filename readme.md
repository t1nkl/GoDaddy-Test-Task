Write Rest API application with one UI page "dashboard" for the book library which allows to track what books they have.

(only books, without any other dependencies like clients, etc.)

## Acceptance  criteria:

### Required
* Application should use the latest PHP version
* Application should use "composer" to install all dependencies
* Application should use Symfony framework above version 5 (preferably version 6)
* Application should have one UI page "dashboard", which will contain information from the API endpoint (it can be the count of books or something else)
* The "dashboard" application must be implemented using React JS
* The final result should be posted on GitHub and should have comments with a clear message about what was done there

### Not required (but will be a plus)
* Application should have PHPUnit tests
* Application should have README instructions on how to setup and run an application
* Application should have an automatic setup process with fixtures and migrations
* Application should be built using Docker container (docker-compose)


## Book model:
* Title (string)
* Publisher (string)
* Author (string)
* Genre (string)
* Book publication (date)
* Amount of words in the book (int)
* Book price in US Dollars


To run the application, you need to run the following commands:
``make run``
