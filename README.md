## Setup
- composer install
- npm install
- configure .env file (databse connection and app detail)
- php artisan migrate:fresh --seed
    ### optional:
        - php artisan migrate
        - php artisan db:seed


# HRMS
### PROFILING :
- Employee management
    - Employee record
    - contracts /201 files /etc

- Team Management
    - assign employee
    - team details
    - files /etc

- Department
    - assign employee (if within company premises)
    - department org chart
    - department records

- client management
    - client record
    - contracts /files /etc
    - assign employee
---

### HR :
- DTR
- PAYROLL
- Absent management
- Leave management
- Time schedules
---

### SYSTEM :
- User management
    - Permissions
    - Roles
    - User profile

- Reports