package sanofood.models;

public class user {
    private int id;
    private String email;
    private String name;
    private String lastname;
    private String password;

    public user(String email, String name, String lastname, String password) {
        this.email = email;
        this.name = name;
        this.lastname = lastname;
        this.password = password;
    }

    public String toString() {
        return name + " " + lastname + " (" + email + ")";
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getLastname() {
        return lastname;
    }

    public void setLastname(String lastname) {
        this.lastname = lastname;
    }
    public String getPassword() {
        return password;
    }
    public void setPassword(String password) {
        this.password = password;
    }
}
