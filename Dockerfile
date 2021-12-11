FROM centos:7.4.1708

RUN yum install -y \
    gcc \
    zip-devel \
    libzip \
    libzip-devel \
    git \
    apt-transport-https \
    lsb-release \
    ca-certificates \
    wget \
    curl \
    nano \
    dialog \
    net-tools \
    git \
    sudo \
    openssl \
    libpcre3-dev \
    zip \
    unzip \
    pdo_mysql \
    pcre-devel \
    make \
    libmemcached

RUN yum install -y http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum install --enablerepo=epel,remi-php74,remi -y \
                              php-psr \
                              php \
                              php-devel \
                              php-fpm \
                              php-cli \
                              php-gd \
                              php-mbstring \
                              php-mcrypt \
                              php-mysqlnd \
                              php-pdo \
                              php-xml \
                              php-pear \
                              php-pecl-zip \
                              php-opcache \
                              php-xdebug \
                              php-memcached

#COPY ./conf/xdebug.ini /etc/php.d/xdebug.ini

# Installing apache
RUN yum -y install httpd
COPY ./conf/httpd.conf /etc/httpd/conf/httpd.conf

# copy php-fom conf
COPY ./conf/www.conf /etc/php-fpm.d/www.conf
# RUN mkdir /var/run/php-fpm

# composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv ./composer.phar /usr/local/bin/composer

#Supervisorでnginxとphp-fpmをデーモン起動
RUN yum -y install supervisor
COPY ./conf/supervisord.conf /etc/supervisord.conf

#CMD systemctl start httpd.service
EXPOSE 80 9000

#CMD alias phalcon=/phalcon-devtools/phalcon.php
CMD ["supervisord","-c" ,"/etc/supervisord.conf"]
