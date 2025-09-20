# Use official PHP image
FROM php:8.1-cli

# Copy files to container
WORKDIR /app
COPY . /app

# Expose port 10000
EXPOSE 10000

# Start PHP server
CMD ["php", "-S", "0.0.0.0:10000", "bot.php"]
