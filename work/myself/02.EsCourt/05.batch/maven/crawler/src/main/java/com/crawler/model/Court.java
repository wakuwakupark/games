package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the courts database table.
 * 
 */
@Entity
@Table(name="courts")
@NamedQueries({
	@NamedQuery(name="Court.findAll", query="SELECT c FROM Court c"),
	@NamedQuery(name="Court.findByName", query="SELECT c FROM Court c WHERE c.facility = :facility AND c.name = :name")
})
public class Court implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	@Temporal(TemporalType.TIMESTAMP)
	private Date created;

	@Temporal(TemporalType.TIMESTAMP)
	private Date deleted;

	@Temporal(TemporalType.TIMESTAMP)
	private Date modified;

	private String name;

	//bi-directional many-to-one association to CourtType
	@ManyToOne
	@JoinColumn(name="court_type_id")
	private CourtType courtType;

	//bi-directional many-to-one association to Facility
	@ManyToOne
	private Facility facility;

	//bi-directional many-to-one association to Frame
	@OneToMany(mappedBy="court", cascade=CascadeType.ALL)
	private List<Frame> frames;

	public Court() {
	}

	public Integer getId() {
		return this.id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public Date getCreated() {
		return this.created;
	}

	public void setCreated(Date created) {
		this.created = created;
	}

	public Date getDeleted() {
		return this.deleted;
	}

	public void setDeleted(Date deleted) {
		this.deleted = deleted;
	}

	public Date getModified() {
		return this.modified;
	}

	public void setModified(Date modified) {
		this.modified = modified;
	}

	public String getName() {
		return this.name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public CourtType getCourtType() {
		return this.courtType;
	}

	public void setCourtType(CourtType courtType) {
		this.courtType = courtType;
	}

	public Facility getFacility() {
		return this.facility;
	}

	public void setFacility(Facility facility) {
		this.facility = facility;
	}

	public List<Frame> getFrames() {
		return this.frames;
	}

	public void setFrames(List<Frame> frames) {
		this.frames = frames;
	}

	public Frame addFrame(Frame frame) {
		getFrames().add(frame);
		frame.setCourt(this);

		return frame;
	}

	public Frame removeFrame(Frame frame) {
		getFrames().remove(frame);
		frame.setCourt(null);

		return frame;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((id == null) ? 0 : id.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Court other = (Court) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}
	
}