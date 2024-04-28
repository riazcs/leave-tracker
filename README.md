# Project Setup Instructions

## 1. Clone GitHub repo for this project locally

If the project is hosted on GitHub, you can use git on your local computer to clone it from GitHub onto your local machine.

First, make sure you have git installed locally on your computer. Then, find a location on your computer where you want to store the project. For example, you can create a folder called `sites/`:


Replace `linktogithubrepo.com/` with the actual link to the GitHub repository. Once this command runs, you'll have a copy of the project on your computer.

## 2. cd into your project

Navigate to the project directory using the terminal:


Replace `projectName` with the name of the folder you created in the previous step.

## 3. [Optional]: Checkout the “Start” tag

If a start tag exists in the repository, you can checkout the start point to have a fresh install of the project:


Replace `tutorial` with the name of the working branch you prefer.

## 4. Install Composer Dependencies

Install all of the project dependencies using Composer:


## 5. Install NPM Dependencies

Install necessary NPM packages to move forward:


Or if you prefer yarn:


## 6. Create a copy of your .env file

Make a copy of the `.env.example` file and create a `.env` file:


## 7. Generate an app encryption key

Generate an app encryption key:


## 8. Create an empty database for our application

Create an empty database for your project using your preferred database tools.

## 9. Configure .env file

In the `.env` file, add database information to allow Laravel to connect to the database:


## 10. Migrate the database

Migrate your database:


## 11. [Optional]: Seed the database

If there's a seeding file set up, you can seed the database:


## Super Admin Credentials

- **Email:** admin@gmail.com
- **Password:** super12345678admin

