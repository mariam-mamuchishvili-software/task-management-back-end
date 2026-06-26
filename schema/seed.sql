INSERT INTO `developers` (`id`, `name`, `status`) VALUES
(1, 'Alice Johnson', 'full-stack'),
(2, 'Bob Smith', 'back-end'),
(3, 'Carol White', 'front-end'),
(4, 'David Brown', 'back-end'),
(5, 'Emma Davis', 'full-stack');

INSERT INTO `tasks` (`id`, `title`, `description`, `priority`, `status`, `developer_id`, `tags`) VALUES
(1,  'Implement user authentication',       'Set up JWT-based authentication with login, registration, and token refresh endpoints.',              'high',   'done',     2, '["auth", "security", "api"]'),
(2,  'Design landing page UI',              'Create a responsive landing page following the new brand guidelines and Figma mockups.',               'middle', 'progress', 3, '["ui", "design", "responsive"]'),
(3,  'Set up CI/CD pipeline',               'Configure GitHub Actions workflows for automated testing and deployment to staging and production.',   'high',   'waiting',  4, '["devops", "ci-cd", "automation"]'),
(4,  'Fix payment gateway bug',             'Investigate and resolve intermittent 500 errors occurring during checkout when using Stripe.',         'high',   'progress', 1, '["bug", "payments", "stripe"]'),
(5,  'Create REST API for orders',          'Build CRUD endpoints for the orders resource including filtering, sorting, and pagination support.',   'middle', 'done',     2, '["api", "orders", "rest"]'),
(6,  'Optimize database queries',           'Profile and rewrite slow N+1 queries in the reporting module to reduce average response time.',        'low',    'waiting',  5, '["performance", "database", "optimization"]'),
(7,  'Build dashboard charts',              'Integrate Chart.js to render real-time sales and user activity graphs on the admin dashboard.',        'middle', 'progress', 3, '["frontend", "charts", "dashboard"]'),
(8,  'Write unit tests for auth module',    'Achieve 90%+ coverage on the authentication service using PHPUnit and mock external dependencies.',    'low',    'done',     2, '["testing", "auth", "phpunit"]'),
(9,  'Integrate third-party email service', 'Connect Mailgun for transactional emails: welcome, password reset, and order confirmation templates.', 'middle', 'waiting',  1, '["email", "integration", "mailgun"]'),
(10, 'Refactor legacy codebase',            'Break down the monolithic order-processing module into smaller, testable service classes.',            'low',    'progress', 5, '["refactor", "architecture", "cleanup"]');
