FROM php:8.0-apache

# Install the mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Install session extension and enable it
RUN docker-php-ext-install session && docker-php-ext-enable session

# Update and upgrade packages
RUN apt-get update && apt-get upgrade -y

RUN echo "session.save_path = /tmp" >> /usr/local/etc/php/conf.d/docker-php-session.ini

# Set the working directory
WORKDIR /var/www/html

# Copy your application files into the container
COPY . /var/www/html

# Start the Apache server
CMD ["apache2-foreground"]
