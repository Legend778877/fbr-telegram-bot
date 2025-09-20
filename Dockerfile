# Official PHP runtime
FROM php:8.1-cli

# Set working directory
WORKDIR /app

# Copy all project files
COPY . /app

# Install PDO MySQL extension (for database)
RUN docker-php-ext-install pdo pdo_mysql

# Expose port 10000 (Render expects a port)
EXPOSE 10000

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000", "bot.php"]
