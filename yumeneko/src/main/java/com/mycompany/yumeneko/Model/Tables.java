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
@Table(name = "tables")
@NamedQueries({
    @NamedQuery(name = "Place.findAll", query = "SELECT t FROM Tables t"),
    @NamedQuery(name = "Place.findById", query = "SELECT t FROM Tables t WHERE t.table_id = :table_id"),
    @NamedQuery(name = "Place.findByNumber", query = "SELECT t FROM Tables t WHERE t.table_number = :table_number"),
    @NamedQuery(name = "Place.findByCapacity", query = "SELECT t FROM Tables t WHERE t.capacity = :capacity"),
    @NamedQuery(name = "Place.findByIsAvailable", query = "SELECT t FROM Tables t WHERE t.is_available = :is_available")})
public class Tables implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "table_id")
    private Integer id;
    @Basic(optional = false)
    @Column(name = "table_number")
    private int number;
    @Basic(optional = false)
    @Column(name = "capacity")
    private int capacity;
    @Basic(optional = false)
    @NotNull
    @Column(name = "is_available")
    private boolean isAvailable;

    static EntityManagerFactory emf = Persistence.createEntityManagerFactory("com.iakk_backendVizsga_war_1.0-SNAPSHOTPU");
    
    public Tables() {
    }

    public Tables(Integer id) {
        EntityManager em = emf.createEntityManager();
        
        try {
            Tables t = em.find(Tables.class, id);
            
            this.id = t.getId();
            this.number = t.getNumber();
            this.capacity = t.getCapacity();
            this.isAvailable = t.getIsAvailable();
        } catch (Exception ex) {
            System.err.println("Hiba: " + ex.getLocalizedMessage());
        } finally {
            em.clear();
            em.close();
        }
    }

    public Tables(Integer id, int number, int capacity, boolean isAvailable) {
        this.id = id;
        this.number = number;
        this.capacity = capacity;
        this.isAvailable = isAvailable;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public int getNumber() {
        return number;
    }

    public void setNumber(int number) {
        this.number = number;
    }

    public int getCapacity() {
        return capacity;
    }

    public void setCapacity(int capacity) {
        this.capacity = capacity;
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
        if (!(object instanceof Tables)) {
            return false;
        }
        Tables other = (Tables) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.mycompany.yumeneko.Model.Tables[ id=" + id + " ]";
    }

        

}