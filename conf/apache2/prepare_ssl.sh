sudo mkdir /etc/apache2/ssl
sudo /usr/sbin/make-ssl-cert /usr/share/ssl-cert/ssleay.cnf /etc/apache2/ssl/apache.pem
sudo chmod go-wrx /etc/apache2/ssl/apache.pem
sudo a2enmod ssl
echo '<IfModule mod_ssl.c>' > ~/cakeshop-ssl
echo '  <VirtualHost _default_:443>' >> ~/cakeshop-ssl
echo '    ServerName www.cakeshop.com' >> ~/cakeshop-ssl
echo '    ServerAdmin master@cakeshop.com' >> ~/cakeshop-ssl
echo '    DocumentRoot /projects/cakeshop/src' >> ~/cakeshop-ssl
echo '    <Directory /projects/cakeshop/src>' >> ~/cakeshop-ssl
echo '	    Options FollowSymLinks' >> ~/cakeshop-ssl
echo '	    AllowOverride All' >> ~/cakeshop-ssl
echo '	    Order allow,deny' >> ~/cakeshop-ssl
echo '	    allow from all' >> ~/cakeshop-ssl
echo '    </Directory>' >> ~/cakeshop-ssl
echo '    ErrorLog ${APACHE_LOG_DIR}/cakeshopsslerror.log' >> ~/cakeshop-ssl
echo '    LogLevel debug' >> ~/cakeshop-ssl
echo '    CustomLog ${APACHE_LOG_DIR}/cakeshopsslaccess.log combined' >> ~/cakeshop-ssl
echo '    SSLEngine on' >> ~/cakeshop-ssl
echo '    SSLCertificateFile /etc/apache2/ssl/apache.pem' >> ~/cakeshop-ssl
echo '	  <FilesMatch "\.(cgi|shtml|phtml|php)$">' >> ~/cakeshop-ssl
echo '      SSLOptions +StdEnvVars' >> ~/cakeshop-ssl
echo '	  </FilesMatch>' >> ~/cakeshop-ssl
echo '	  <Directory /usr/lib/cgi-bin>' >> ~/cakeshop-ssl
echo '		  SSLOptions +StdEnvVars' >> ~/cakeshop-ssl
echo '	  </Directory>' >> ~/cakeshop-ssl
echo '	  BrowserMatch "MSIE [2-6]" \' >> ~/cakeshop-ssl
echo '		  nokeepalive ssl-unclean-shutdown \' >> ~/cakeshop-ssl
echo '		  downgrade-1.0 force-response-1.0' >> ~/cakeshop-ssl
echo '	  BrowserMatch "MSIE [17-9]" ssl-unclean-shutdown' >> ~/cakeshop-ssl
echo '  </VirtualHost>' >> ~/cakeshop-ssl
echo '</IfModule>' >> ~/cakeshop-ssl
sudo cp ~/cakeshop-ssl /etc/apache2/sites-available/cakeshop-ssl
sudo a2ensite cakeshop-ssl
sudo service apache2 reload
sudo rm ~/cakeshop-ssl







