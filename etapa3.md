

        // table(numele tabelului in care vrem sa facem operatia)
        Schema::table('users', function (Blueprint $table) {
            // unde table integer votes 
            // definirea unei noi coloane pentru tabele definite mai sus
            // $table este un obiect 
            // string este tipul(o metoda ce spune noii culoane tipul tau)
            // (numele coloane ce vrem o dam)
            $table->string('last_name');
        });