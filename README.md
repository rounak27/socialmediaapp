# Social Mda

Welcome to Social Mda, a social media platform for sharing pictures and connecting with friends.

## Features

- **User Authentication**: Secure user authentication system allows users to register, login, and logout.
- **Picture Sharing**: Users can upload and share pictures with their friends and followers.
- **Likes and Dislikes**: Users can like and dislike pictures posted by others.
- **User Profiles**: Each user has a profile page displaying their uploaded pictures and other information.
- **Real-time Updates**: Likes and dislikes on pictures are updated in real-time without the need to refresh the page.
- **Responsive Design**: The application is responsive and works well on desktop and mobile devices.

## Technologies Used

- **Laravel**: Backend framework for building robust web applications.
- **JavaScript/jQuery**: Frontend scripting language for interactive features.
- **HTML/CSS**: Markup and styling for the user interface.
- **MySQL**: Database management system for storing user data and pictures.
- **Bootstrap**: Frontend framework for designing responsive and attractive UI components.

## Installation

1. Clone the repository: `git clone https://github.com/rounak27/socialmediaapp.git`
2. Install dependencies: `composer install && npm install`
3. Set up environment variables: Copy `.env.example` to `.env` and configure database settings.
4. Generate application key: `php artisan key:generate`
5. Migrate and seed the database: `php artisan migrate --seed`
6. Start the development server: `php artisan serve`

## Usage

1. Open your web browser and navigate to `http://localhost:8000`.
2. Register a new account or login with existing credentials.
3. Explore the platform, upload pictures, like and dislike pictures, and connect with friends.



## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
