#!/bin/bash
cat create_database_cake.sql prepare_data_cake.sql > cake_tmpscript.sql
mysql -u root -p < cake_tmpscript.sql
rm cake_tmpscript.sql
