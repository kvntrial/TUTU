FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Ensure data directory exists and has write permissions
RUN mkdir -p /var/www/html/data && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 777 /var/www/html/data

# Render provides the $PORT environment variable dynamically (usually 10000)
ENV PORT=80
EXPOSE 80

CMD ["sh", "-c", "sed -i \"s/80/$PORT/g\" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf && exec apache2-foreground"]
