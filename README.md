# todo-list-202401

## First iteration

### Objective
The idea is to deliver the bare minimum functionality to see every section (FE, BE, Infra, CI/CD, and local development) working.
No framework should be used for this iteration.

### Requirements
* Anonymous authentication
* Users can update their display name
* Users can see their display name

### Concepts to apply
None

## Usage
### Local development
From root folder:
* Build the Docker image: `docker build -t todo-list-202401-php .`
* Run it: `docker run -p 8000:8000 -p 8080:8080 -v $(pwd):/var/www/html todo-list-202401-php`
