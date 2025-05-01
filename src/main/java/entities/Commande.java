package entities;

import java.time.LocalDateTime;

public class Commande {
    private int id;
    private int userId;
    private LocalDateTime dateCreation;
    private String status;
    private String deliveryAddress;
    private String phone;
    private String paymentMethod;
    private float totalPrice;
    private Integer deliveryId;

    public Commande() {}

    public Commande(int id, int userId, LocalDateTime dateCreation, String status, String deliveryAddress,
                    String phone, String paymentMethod, float totalPrice, Integer deliveryId) {
        this.id = id;
        this.userId = userId;
        this.dateCreation = dateCreation;
        this.status = status;
        this.deliveryAddress = deliveryAddress;
        this.phone = phone;
        this.paymentMethod = paymentMethod;
        this.totalPrice = totalPrice;
        this.deliveryId = deliveryId;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getUserId() { return userId; }
    public void setUserId(int userId) { this.userId = userId; }

    public LocalDateTime getDateCreation() { return dateCreation; }
    public void setDateCreation(LocalDateTime dateCreation) { this.dateCreation = dateCreation; }

    public String getStatus() { return status; }
    public void setStatus(String status) { this.status = status; }

    public String getDeliveryAddress() { return deliveryAddress; }
    public void setDeliveryAddress(String deliveryAddress) { this.deliveryAddress = deliveryAddress; }

    public String getPhone() { return phone; }
    public void setPhone(String phone) { this.phone = phone; }

    public String getPaymentMethod() { return paymentMethod; }
    public void setPaymentMethod(String paymentMethod) { this.paymentMethod = paymentMethod; }

    public float getTotalPrice() { return totalPrice; }
    public void setTotalPrice(float totalPrice) { this.totalPrice = totalPrice; }

    public Integer getDeliveryId() { return deliveryId; }
    public void setDeliveryId(Integer deliveryId) { this.deliveryId = deliveryId; }
}
