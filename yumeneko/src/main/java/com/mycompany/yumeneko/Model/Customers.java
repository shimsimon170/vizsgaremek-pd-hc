/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.yumeneko.Model;

import java.io.Serializable;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Lob;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.ParameterMode;
import javax.persistence.Persistence;
import javax.persistence.StoredProcedureQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Pattern;
import javax.validation.constraints.Size;

/**
 *
 * @author patak
 */

@Entity
@Table(name = "customers")
@NamedQueries({
    @NamedQuery(name = "Customers.findAll", query = "SELECT u FROM Customers u"),
    @NamedQuery(name = "Customers.findById", query = "SELECT u FROM Customers u WHERE u.id = :id"),
    @NamedQuery(name = "Customers.findByEmail", query = "SELECT u FROM Customers u WHERE u.email = :email"),
    @NamedQuery(name = "Customers.findByPhoneNumber", query = "SELECT u FROM Customers u WHERE u.phoneNumber = :phoneNumber"),
    @NamedQuery(name = "Customers.findByName", query = "SELECT u FROM Customers u WHERE u.name = :name"),
    @NamedQuery(name = "Customers.findByIsAdmin", query = "SELECT u FROM Customers u WHERE u.isAdmin = :isAdmin"),
    @NamedQuery(name = "Customers.findByIsDeleted", query = "SELECT u FROM Customers u WHERE u.isDeleted = :isDeleted"),
    @NamedQuery(name = "Customers.findByCreatedAt", query = "SELECT u FROM Customers u WHERE u.createdAt = :createdAt"),
    @NamedQuery(name = "Customers.findByDeletedAt", query = "SELECT u FROM Customers u WHERE u.deletedAt = :deletedAt")})
public class Customers implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id")
    private Integer id;
    @Pattern(regexp = "[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?", message = "Invalid email")//if the field contains email address consider using this annotation to enforce field validation
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 100)
    @Column(name = "email")
    private String email;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 30)
    @Column(name = "phone_number")
    private String phoneNumber;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 50)
    @Column(name = "name")
    private String name;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 50)
    @Column(name = "password")
    private String password;
    @Basic(optional = false)
    @NotNull
    @Column(name = "is_admin")
    private boolean isAdmin;
    @Basic(optional = false)
    @NotNull
    @Column(name = "is_deleted")
    private boolean isDeleted;
    @Basic(optional = false)
    @NotNull
    @Column(name = "created_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date createdAt;
    @Column(name = "deleted_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date deletedAt;

    static EntityManagerFactory emf = Persistence.createEntityManagerFactory("com.mycompany_yumeneko_war_1.0-SNAPSHOTPU");

public Customers(Integer id) {
        EntityManager em = emf.createEntityManager();

        try {
            Customers u = em.find(Customers.class, id);

            this.id = u.getId();
            this.email = u.getEmail();
            this.phoneNumber = u.getPhoneNumber();
            this.name = u.getName();
            this.password = u.getPassword();
            this.isAdmin = u.getIsAdmin();
            this.isDeleted = u.getIsDeleted();
            this.createdAt = u.getCreatedAt();
        } catch (Exception ex) {
            System.err.println("Hiba: " + ex.getLocalizedMessage());
        } finally {
            em.clear();
            em.close();
        }
    }

    public Customers(Integer id, String email, String phoneNumber, String name, String password, boolean isAdmin, boolean isDeleted, Date createdAt, Date deletedAt) {
        this.id = id;
        this.email = email;
        this.phoneNumber = phoneNumber;
        this.name = name;
        this.password = password;
        this.isAdmin = isAdmin;
        this.isDeleted = isDeleted;
        this.createdAt = createdAt;
        this.deletedAt = deletedAt;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPhoneNumber() {
        return phoneNumber;
    }

    public void setPhoneNumber(String phoneNumber) {
        this.phoneNumber = phoneNumber;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }
    
    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public boolean getIsAdmin() {
        return isAdmin;
    }

    public void setIsAdmin(boolean isAdmin) {
        this.isAdmin = isAdmin;
    }

    public boolean getIsDeleted() {
        return isDeleted;
    }

    public void setIsDeleted(boolean isDeleted) {
        this.isDeleted = isDeleted;
    }

    public Date getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Date createdAt) {
        this.createdAt = createdAt;
    }

    public Date getDeletedAt() {
        return deletedAt;
    }

    public void setDeletedAt(Date deletedAt) {
        this.deletedAt = deletedAt;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Customers)) {
            return false;
        }
        Customers other = (Customers) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.iakk.backendvizsga.model.User[ id=" + id + " ]";
    }

    public Customers login(String email, String password) {
        EntityManager em = emf.createEntityManager();

        try {
            StoredProcedureQuery spq = em.createStoredProcedureQuery("login");
            
            spq.registerStoredProcedureParameter("emailIN", String.class, ParameterMode.IN);
            spq.registerStoredProcedureParameter("passwordIN", String.class, ParameterMode.IN);
            
            spq.setParameter("emailIN", email);
            spq.setParameter("passwordIN", password);
            
            spq.execute();
            
            List<Object[]> resultList = spq.getResultList();
            Customers toReturn = new Customers();
            SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
            for(Object[] o : resultList){
                Customers u = new Customers(
                        Integer.valueOf(o[0].toString()),
                        o[1].toString(),
                        o[2].toString(),
                        o[3].toString(),
                        o[4].toString(),
                        Boolean.parseBoolean(o[5].toString()),
                        Boolean.parseBoolean(o[6].toString()),
                        formatter.parse(o[7].toString()),
                        o[9] == null ? null : formatter.parse(o[9].toString())
                );
                toReturn = u;
            }
            
            return toReturn;
            
        } catch (NumberFormatException | ParseException e) {
            System.err.println("Hiba: " + e.getLocalizedMessage());
            return null;
        } finally {
            em.clear();
            em.close();
        }
    }
    public Boolean register(Customers u){
    EntityManager em= emf.createEntityManager();
    try{
        StoredProcedureQuery spq = em.createStoredProcedureQuery("registration");
        
        
       spq.registerStoredProcedureParameter("emailIN", String.class, ParameterMode.IN);
       
       spq.setParameter("emailIN", u.getEmail());
       
       spq.execute();
       
       return true;
    } catch (Exception e ){
        System.err.println("Hiba");
        return false;
    }finally {
        em.clear();
        em.close();
    }
    } 
    public Boolean isUserExists(String email){
    EntityManager em= emf.createEntityManager();
    try{
         StoredProcedureQuery spq = em.createStoredProcedureQuery("isUserExsits");
        
       spq.registerStoredProcedureParameter("emailIN", String.class, ParameterMode.IN);
       spq.registerStoredProcedureParameter("resultOUT", Boolean.class, ParameterMode.OUT);
       
       spq.setParameter("emailIN", email);
       
       spq.execute();
       Boolean result = Boolean.valueOf(spq.getOutputParameterValue("resultOUT").toString());
    }catch (Exception e ){
        System.err.println("Hiba");
        return false;
    }finally {
        em.clear();
        em.close();
    }
  }
}
