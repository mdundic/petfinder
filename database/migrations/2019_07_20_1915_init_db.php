<?php

use Illuminate\Database\Migrations\Migration;

class InitDb extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $statement = <<<'SQL'
            CREATE TYPE admin_user_roles AS ENUM (
                'admin',
                'moderator'
            );

            CREATE TYPE pet_types AS ENUM (
                'dog',
                'cat'
            );

            CREATE TYPE pet_colors AS ENUM (
                'black',
                'white',
                'gray',
                'brown'
            );


            CREATE TYPE pet_sizes AS ENUM (
                'small',
                'medium',
                'big'
            );

            CREATE TYPE locations AS ENUM (
                'belgrade',
                'pancevo'
            );

            CREATE TABLE admin_users (
                id serial PRIMARY KEY,
                first_name text NOT NULL CHECK(trim(first_name) <> ''),
                last_name text NOT NULL CHECK(trim(last_name) <> ''),
                email text NOT NULL UNIQUE CHECK(trim(email) <> ''),
                password text NOT NULL,
                role admin_user_roles NOT NULL,
                created_at timestamp(0) without time zone NOT NULL DEFAULT now(),
                updated_at timestamp(0) without time zone NOT NULL DEFAULT now()
            );

            CREATE TABLE users (
                id serial PRIMARY KEY,
                first_name text NOT NULL CHECK(trim(first_name) <> ''),
                last_name text NOT NULL CHECK(trim(last_name) <> ''),
                email text NOT NULL UNIQUE CHECK(trim(email) <> ''),
                password text NOT NULL,
                created_at timestamp(0) without time zone NOT NULL DEFAULT now(),
                updated_at timestamp(0) without time zone NOT NULL DEFAULT now()
            );

            CREATE TABLE lost_pets (
                id serial PRIMARY KEY,
                name text NOT NULL CHECK(trim(name) <> ''),
                type pet_types NOT NULL,
                breed text CHECK(trim(breed) <> ''),
                picture text NOT NULL,
                location locations NOT NULL,
                color pet_colors NOT NULL,
                size pet_sizes NOT NULL,
                description text CHECK(trim(description) <> ''),
                is_found boolean NOT NULL DEFAULT false,
                user_id integer NOT NULL REFERENCES users(id),
                lost_at timestamp(0) without time zone NOT NULL,
                found_at timestamp(0) without time zone,
                created_at timestamp(0) without time zone NOT NULL DEFAULT now(),
                updated_at timestamp(0) without time zone NOT NULL DEFAULT now()
            );

            CREATE TABLE found_pets (
                id serial PRIMARY KEY,
                name text CHECK(trim(name) <> ''),
                type pet_types NOT NULL,
                breed text CHECK(trim(breed) <> ''),
                picture text NOT NULL,
                location locations NOT NULL,
                color pet_colors NOT NULL,
                size pet_sizes NOT NULL,
                description text CHECK(trim(description) <> ''),
                is_returned boolean NOT NULL DEFAULT false,
                user_id integer NOT NULL REFERENCES users(id),
                found_at timestamp(0) without time zone NOT NULL,
                returned_at timestamp(0) without time zone,
                created_at timestamp(0) without time zone NOT NULL DEFAULT now(),
                updated_at timestamp(0) without time zone NOT NULL DEFAULT now()
            );

SQL;

        DB::unprepared($statement);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $statement = <<<'SQL'
            DROP table admin_users, users, lost_pets, found_pets;
            DROP TYPE admin_user_roles, pet_types, pet_colors, pet_sizes, locations;
SQL;

        DB::unprepared($statement);
    }
}
