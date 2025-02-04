# HNG 12 Stage 1 Task

This API classifies numbers based on their mathematical properties and provides fun facts using the [Numbers API](http://numbersapi.com).  

## Features  
- Determines whether a number is **prime**.  
- Checks if a number is **perfect**.  
- Identifies if a number is an **Armstrong number**.  
- Categorizes numbers as **even** or **odd**.  
- Computes the **sum of digits**.  
- Retrieves a **fun fact** about the number using the Numbers API.  

## API Endpoint  

### `GET /api/classify-number?number={integer}`  

#### Request Parameters  
| Parameter | Type     | Required | Description                     |
|-----------|----------|----------|---------------------------------|
| `number`  | `integer` | ✅ Yes  | The number to classify          |

## Response Format  

### ✅ Success Response (`200 OK`)  
```json
{
    "number": 371,
    "is_prime": false,
    "is_perfect": false,
    "properties": ["armstrong", "odd"],
    "digit_sum": 11,
    "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"
}
```
### ❌ Error Response (400 Bad Request)
```json
{
    "number": "abc",
    "error": true
}
```

## Acceptance Criteria  

### ✅ Functionality  
- Accepts **GET** requests with a `number` parameter.  
- Returns JSON in the specified format.  
- Accepts **all valid integers** as input.  
- Provides appropriate **HTTP status codes**.  

### 🛠️ Code Quality  
- Organized **code structure**.  
- Includes **basic error handling and input validation**.  
- Avoids **hardcoded values**.  

### 📖 Documentation  
- Complete **README.md** file.  

### Project Structure
```bash
.
├── Controllers
│   ├── ApiController.php     # Handles API requests
│   └── IndexController.php   # Handles homepage or default routes
├── Libraries
│   ├── App.php               # Core application logic
│   └── helper.php            # Contains helper functions (math checks, API requests)
├── README.md                 # Project documentation
├── composer.json             # PHP dependencies (if any)
└── index.php                 # Entry point for the application

```
## 🛠 Installation & Setup  

### 📥 Clone the Repository  
```bash
git clone https://github.com/samsmithkruz/hng12_01.git
cd hng12_01
```
### ⚙️ Install Dependencies
```bash
composer install
```
### 🚀 Run the Application Locally
Start a PHP development server:
``` bash
php -S localhost:8000
```
### 🌐 Access the API
Visit: ```http://localhost:8000/api/classify-number?number=371```

### Technologies Used
- PHP
- cURL (for API requests)
- JSON (for structured responses)
- Composer (for dependency management)