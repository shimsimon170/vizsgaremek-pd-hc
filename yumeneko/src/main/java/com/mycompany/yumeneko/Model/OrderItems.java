/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.yumeneko.Model;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Persistence;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.NotNull;

/**
 *
 * @author patak
 */
@Entity
@Table(name = "order_items")
@NamedQueries({
    @NamedQuery(name = "Ticket.findAll", query = "SELECT ot FROM OrderItems ot"),
    @NamedQuery(name = "Ticket.findByOrderItemId", query = "SELECT ot FROM OrderItems ot WHERE ot.order_item_id = :order_item_id"),
    @NamedQuery(name = "Ticket.findByOrderId", query = "SELECT ot FROM OrderItems ot WHERE ot.order_id = :order_id"),
    @NamedQuery(name = "Ticket.findByMenuItemId", query = "SELECT ot FROM OrderItems ot WHERE ot.menu_item_id = :menu_item_id"),
    @NamedQuery(name = "Ticket.findByQuantity", query = "SELECT ot FROM OrderItems ot WHERE ot.quantity = :quantity"),
    @NamedQuery(name = "Ticket.findByPrice", query = "SELECT ot FROM OrderItems ot WHERE ot.price = :price")})
public class OrderItems implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "order_item_id")
    private Integer id;
    @Basic(optional = false)
    @NotNull
    @Column(name = "order_id")
    private int orderId;
    @Basic(optional = false)
    @NotNull
    @Column(name = "menu_item_id")
    private int menuId;
    @Basic(optional = false)
    @NotNull
    @Column(name = "quantity")
    private int amount;
    @Basic(optional = false)
    @NotNull
    @Column(name = "price")
    private int price;

    static EntityManagerFactory emf = Persistence.createEntityManagerFactory("com.iakk_backendVizsga_war_1.0-SNAPSHOTPU");
    
    public OrderItems() {
    }

    public OrderItems(Integer id) {
        EntityManager em = emf.createEntityManager();

        try {
            OrderItems ot = em.find(OrderItems.class, id);

            this.id = ot.getId();
            this.orderId = ot.getOrderId();
            this.menuId = ot.getMenuId();
            this.amount = ot.getAmount();
            this.price = ot.getPrice();
        } catch (Exception ex) {
            System.err.println("Hiba: " + ex.getLocalizedMessage());
        } finally {
            em.clear();
            em.close();
        }
    }

    public OrderItems(Integer id, int orderId, int menuId, int amount, int price) {
        this.id = id;
        this.orderId = orderId;
        this.menuId = menuId;
        this.amount = amount;
        this.price = price;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public int getOrderId() {
        return orderId;
    }

    public void setOrderId(int orderId) {
        this.orderId = orderId;
    }

    public int getMenuId() {
        return menuId;
    }

    public void setmenuId(int menuId) {
        this.menuId = menuId;
    }

    public int getAmount() {
        return amount;
    }

    public void setAmount(int amount) {
        this.amount = amount;
    }

    public int getPrice() {
        return price;
    }

    public void setPrice(int price) {
        this.price = price;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof OrderItems)) {
            return false;
        }
        OrderItems other = (OrderItems) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.mycompany.yumeneko.Model.OrderItems[ id=" + id + " ]";
    }

        

}

