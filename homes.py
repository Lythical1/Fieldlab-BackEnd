import random

def generate_vacation_home(id, places):
    name_prefixes = ["Sunny", "Cozy", "Luxurious", "Tranquil", "Charming"]
    name_suffixes = ["Hideaway", "Retreat", "Villa", "Cottage", "Haven"]

    home = {
        "id": id,
        "title": f"{random.choice(name_prefixes)} {random.choice(name_suffixes)}",
        "rating": random.randint(1, 5),
        "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        "availability": random.choice([True, False]),
        "price": round(random.uniform(100, 500), 2),
        "location": random.choice(places),
        "check_in": "2021-01-01",
        "check_out": "2021-01-07",
        "manager_id": random.randint(1, 5),
    }

    return home

def generate_sql_insert_statement(home):
    return f"""
    INSERT INTO properties (id, title, rating, description, availability, price, location, check_in, check_out, manager_id)
    VALUES ('{home['title']}', {home['rating']}, '{home['description']}', {home['availability']},
    {home['price']}, '{home['location']}', '{home['check_in']}', '{home['check_out']}', {home['manager_id']});
    """

def generate_vacation_homes(num_homes, places):
    homes = [generate_vacation_home(i + 1, places) for i in range(num_homes)]
    return homes

if __name__ == "__main__":
    # List of places in the Netherlands
    netherlands_places = ["Amsterdam", "Rotterdam", "Utrecht", "The Hague", "Eindhoven", "Maastricht", "Groningen", "Haarlem", "Leiden", "Nijmegen"]

    num_homes_to_generate = 410
    vacation_homes_data = generate_vacation_homes(num_homes_to_generate, netherlands_places)

    # Generate SQL insert statements
    sql_insert_statements = [generate_sql_insert_statement(home) for home in vacation_homes_data]

    # Write SQL statements to a file
    with open("vacation_homes.sql", "w") as sql_file:
        sql_file.write("\n".join(sql_insert_statements))

    print("SQL statements written to vacation_homes.sql")
