FROM php:7.4-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql pgsql pdo_pgsql

# Set the ServerName to avoid Apache warnings
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy the content of your project to the /var/www/html directory
COPY . /var/www/html/

# Expose port 80
EXPOSE 8888

# Change the default Apache port to 8118
RUN sed -i 's/80/8888/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Grant write permissions to the web server
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Ensure Apache stays running
CMD ["apache2-foreground"]
