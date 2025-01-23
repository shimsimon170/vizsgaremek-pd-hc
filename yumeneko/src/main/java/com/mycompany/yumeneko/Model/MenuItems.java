/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.yumeneko.Model;

import java.io.Serializable;
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
import javax.validation.constraints.NotNull;

/**
 *
 * @author patak
 */
@Entity
@Table(name = "menu_items")
@NamedQueries({
    @NamedQuery(name = "MenuItems.findAll", query = "SELECT mt FROM MenuItems mt"),
    @NamedQuery(name = "MenuItems.findByMenuItemId", query = "SELECT mt FROM MenuItems mt WHERE mt.id = :menu_item_id"),
    @NamedQuery(name = "MenuItems.findByName", query = "SELECT mt FROM MenuItems mt WHERE mt.name = :name"),
    @NamedQuery(name = "MenuItems.findByDescription", query = "SELECT mt FROM MenuItems mt WHERE mt.description = :description"),
    @NamedQuery(name = "MenuItems.findByPrice", query = "SELECT mt FROM MenuItems mt WHERE mt.price = :price"),
    @NamedQuery(name = "MenuItems.findByCategory", query = "SELECT mt FROM MenuItems mt WHERE mt.category = :category"),
    @NamedQuery(name = "MenuItems.findByIsAvailable", query = "SELECT mt FROM MenuItems mt WHERE mt.isAvailable = :is_available")})
public class MenuItems implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "menu_item_id")
    private Integer id;
    @Basic(optional = false)
    @NotNull
    @Column(name = "name")
    private String name;
    @Basic(optional = false)
    @NotNull
    @Column(name = "description")
    private String description;
    @Basic(optional = false)
    @NotNull
    @Column(name = "price")
    private int price;
    @Basic(optional = false)
    @NotNull
    @Column(name = "category")
    private String category;
    @Basic(optional = false)
    @NotNull
    @Column(name = "is_available")
    private boolean isAvailable;

    static EntityManagerFactory emf = Persistence.createEntityManagerFactory("com.iakk_backendVizsga_war_1.0-SNAPSHOTPU");
    
    public MenuItems() {
    }

    public MenuItems(Integer id) {
        EntityManager em = emf.createEntityManager();

        try {
            MenuItems mt = em.find(MenuItems.class, id);

            this.id = mt.getId();
            this.name = mt.getName();
            this.description = mt.getDescription();
            this.price = mt.getPrice();
            this.category = mt.getCategory();
            this.isAvailable = mt.getIsAvailable();
        } catch (Exception ex) {
            System.err.println("Hiba: " + ex.getLocalizedMessage());
        } finally {
            em.clear();
            em.close();
        }
    }

    public MenuItems(Integer id, String name, String description, int price, String category, boolean isAvailable) {
        this.id = id;
        this.name = name;
        this.description = description;
        this.price = price;
        this.category = category;
        this.isAvailable = isAvailable;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public int getPrice() {
        return price;
    }

    public void setPrice(int price) {
        this.price = price;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }
    
    public boolean getIsAvailable() {
        return isAvailable;
    }

    public void setIsAvailable(boolean isAvailable) {
        this.isAvailable = isAvailable;
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
        if (!(object instanceof MenuItems)) {
            return false;
        }
        MenuItems other = (MenuItems) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.mycompany.yumeneko.Model.MenuItems[ id=" + id + " ]";
    }

        

}
