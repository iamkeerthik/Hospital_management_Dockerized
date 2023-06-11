# Base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the PHP application files to the container
COPY app/ /var/www/html

# Install additional dependencies if needed
# For example, if you require any PHP extensions or libraries, you can install them here

# Expose the port on which Apache will listen
EXPOSE 80

# Start Apache service
CMD ["apache2-foreground"]
