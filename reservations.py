import random
from datetime import datetime, timedelta

def generate_reservation(id, customer_ids, property_ids, manager_ids):
    check_in_date = datetime.now() + timedelta(days=random.randint(1, 30))
    check_out_date = check_in_date + timedelta(days=random.randint(1, 14))

    reservation = {
        "id": id,
        "customer_id": random.choice(customer_ids),
        "property_id": random.choice(property_ids),
        "manager_id": random.choice(manager_ids),
        "check_in": check_in_date.strftime("%Y-%m-%d"),
        "check_out": check_out_date.strftime("%Y-%m-%d")
    }

    return reservation

def generate_sql_insert_statement(reservation):
    return f"""
    INSERT INTO reservations (customer_id, property_id, manager_id, check_in, check_out)
    VALUES ({reservation['customer_id']}, {reservation['property_id']},
    {reservation['manager_id']}, '{reservation['check_in']}', '{reservation['check_out']}');
    """

def generate_reservations(num_reservations, customer_ids, property_ids, manager_ids):
    reservations = [generate_reservation(i + 1, customer_ids, property_ids, manager_ids) for i in range(num_reservations)]
    return reservations

if __name__ == "__main__":
    # Assuming you have customer_ids, property_ids, and manager_ids available
    customer_ids = list(range(1, 10))  # Assuming 100 customers
    property_ids = list(range(1, 410))  # Assuming 410 vacation homes
    manager_ids = list(range(1, 6))      # Assuming 5 managers

    num_reservations_to_generate = 50  # Adjust the number of reservations as needed
    reservations_data = generate_reservations(num_reservations_to_generate, customer_ids, property_ids, manager_ids)

    # Generate SQL insert statements
    sql_insert_statements = [generate_sql_insert_statement(reservation) for reservation in reservations_data]

    # Write SQL statements to a file
    with open("reservations.sql", "w") as sql_file:
        sql_file.write("\n".join(sql_insert_statements))

    print("SQL statements written to reservations.sql")
