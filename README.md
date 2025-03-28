# Nursery Management API

## 🌱 Project Overview

This is a comprehensive API for a growing plant nursery, designed to streamline plant stock management, sales tracking, and enhance customer experience.

## 🚀 Key Features

### User Management
- JWT-based authentication
- Role-based access control
- Customer and employee account management

### Plant Management
- Browse available plants
- Detailed plant information (name, description, price, images, category)
- Unique slug-based plant identification

### Order Management
- Customer order placement
- Order status tracking
- Order cancellation before preparation

### Admin Capabilities
- Plant and category management
- Sales statistics and reporting
- User role administration

## 📋 User Stories Implemented

### Customer Experiences
- User registration and login
- View plant catalog
- Place orders
- Check order status
- Cancel pending orders

### Employee Capabilities
- Role-based login
- Order management
- Update order status

### Admin Features
- Comprehensive sales analytics
- Full CRUD operations on plants and categories

## 🛠 Technical Stack

- **Backend**: Laravel
- **Authentication**: JWT
- **Testing**: PHPUnit
- **API Documentation**: Swagger/OpenAPI
- **Database Interaction**: DAO Pattern
- **Slugs**: Spatie Sluggable

## 🔧 Development Requirements

### Prerequisites
- PHP 8.1+
- Composer
- Laravel 9/10
- MySQL/PostgreSQL

### Installation

1. Clone the repository
   ```bash
   git clone https://github.com/your-username/nursery-api.git
   ```

2. Install dependencies
   ```bash
   composer install
   ```

3. Setup environment
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure database in `.env`

5. Run migrations
   ```bash
   php artisan migrate
   ```

6. Start development server
   ```bash
   php artisan serve
   ```

## 🧪 Testing

Run test suite:
```bash
php artisan test
```

## 📄 API Documentation

Swagger/OpenAPI documentation available at `/api/documentation`

## 🌟 Extra Features

- DTO for data validation
- Limited plant images (max 4)
- Comprehensive error handling

## 🔐 Security

- JWT Authentication
- Role-based permissions
- Input validation
- Exception handling

## 📊 Development Roadmap

- [ ] Complete user authentication
- [ ] Implement plant management endpoints
- [ ] Develop order processing system
- [ ] Create admin dashboard
- [ ] Comprehensive test coverage

## 💻 Developers

- Implement DAO for database interactions
- Use DTOs for data transfer
- Write clear, descriptive error messages
- Maintain high test coverage

## 📫 Contact

For issues or inquiries, please open a GitHub issue or contact [Your Contact Information]

## 📜 License

[Specify your license, e.g., MIT License]

## UML :

<a href="https://lucid.app/lucidchart/c954d2fc-239e-4668-9f28-feb0c4bc7711/edit?beaconFlowId=DEC28E1B50B84749&invitationId=inv_cc394b06-80d0-4691-a381-ad69160f29f3&page=0_0">Diagramme use case</a> <br>
<a href="https://lucid.app/lucidchart/767cfed2-17a5-47ca-b4bc-9ebad3cc0cbf/edit?beaconFlowId=D37492C25A6CEB73&page=0_0&invitationId=inv_ccd444a3-e67d-431d-8600-d82a8fbac31d">Diagramme de Classe</a><br>

##  Planification :

<a href="https://hamzachehlaoui3.atlassian.net/jira/software/projects/AP/boards/67">Planification</a>
