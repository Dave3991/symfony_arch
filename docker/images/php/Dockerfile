FROM php:7.3-fpm
ENV DEBIAN_FRONTEND=noninteractive
ENV RUNNING_IN_DOCKER="TRUE"
ENV PHP_CLI_INI_PATH="/usr/local/etc/php/php.ini"


RUN echo "max_execution_time=0" >> $PHP_CLI_INI_PATH \
    && echo "max_input_time=0" >> $PHP_CLI_INI_PATH \
    && echo "memory_limit=8192M" >> $PHP_CLI_INI_PATH


# test PHP version
RUN php -r "if(strpos(PHP_VERSION, '7.3.') !== 0){ echo 'Invalid PHP version '.PHP_VERSION; exit(1); }"

# Codesniffer
WORKDIR /tmp
RUN curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && \
    cp /tmp/phpcs.phar /usr/local/bin/phpcs && \
    chmod +x /usr/local/bin/phpcs

# Install latest Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# stuff for development
RUN composer global require --dev --no-update --ansi hirak/prestissimo:"0.3.*" && \
    composer global require --dev --no-update --ansi squizlabs/php_codesniffer:"3.*" && \
    composer global require --dev --no-update --ansi slevomat/coding-standard:"4.*" && \
    composer global require --dev --no-update --ansi phpstan/phpstan-shim:"0.11.*" && \
    composer global require --dev --no-update --ansi mockery/mockery:"0.9.*" && \
    composer global require --dev --no-update --ansi jakub-onderka/php-parallel-lint:">0.9" && \
    composer global require --dev --no-update --ansi jakub-onderka/php-console-highlighter:">0.3"&& \
    composer self-update && \
    composer global update --no-scripts --prefer-dist --ansi


